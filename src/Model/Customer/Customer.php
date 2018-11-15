<?php

declare(strict_types=1);

/*
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace FAPI\Sylius\Model\Customer;

use FAPI\Sylius\Model\CreatableFromArray;

/**
 * @author Kasim Taskin <taskinkasim@gmail.com>
 */
final class Customer implements CreatableFromArray
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var User
     */
    private $user;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $emailCanonical;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $gender;

    /**
     * Customer constructor.
     */
    private function __construct(
        int $id,
        User $user,
        string $email,
        string $emailCanonical,
        string $firstName,
        string $lastName,
        string $gender
    ) {
        $this->id = $id;
        if (-1 !== $user->getId()) {
            $this->user = $user;
        }
        $this->email = $email;
        $this->emailCanonical = $emailCanonical;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
    }

    /**
     * @return Customer
     */
    public static function createFromArray(array $data): self
    {
        $id = -1;
        if (isset($data['id'])) {
            $id = $data['id'];
        }

        $user = User::createFromArray([]);
        if (isset($data['user'])) {
            $user = User::createFromArray($data['user']);
        }

        $email = '';
        if (isset($data['email'])) {
            $email = $data['email'];
        }

        $emailCanonical = '';
        if (isset($data['emailCanonical'])) {
            $emailCanonical = $data['emailCanonical'];
        }

        $firstName = '';
        if (isset($data['firstName'])) {
            $firstName = $data['firstName'];
        }

        $lastName = '';
        if (isset($data['lastName'])) {
            $lastName = $data['lastName'];
        }

        $gender = '';
        if (isset($data['gender'])) {
            $gender = $data['gender'];
        }

        return new self($id, $user, $email, $emailCanonical, $firstName, $lastName, $gender);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getEmailCanonical(): string
    {
        return $this->emailCanonical;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getGender(): string
    {
        return $this->gender;
    }
}
