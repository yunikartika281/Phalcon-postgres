<?php

declare(strict_types=1);

namespace Pbackbone\Validation;

use Pbackbone\Model\UsersModel as TableModel;

class UsersCreateDataValidation extends \Pbackbone\Validation\BaseValidation
{
    public function initialize()
    {
        $this->add(
            [
                "isActive",
                "isLogin",
                "isResetPassword",
            ],
            new \Phalcon\Validation\Validator\InclusionIn([
                "domain" => [
                    "isActive" => ["yes", "no"],
                    "isLogin" => ["yes", "no"],
                    "isResetPassword" => ["yes", "no"],
                ],
                "message" => ":field must be :domain",
            ])
        );

        $this->add(
            [
                "firstName",
                "lastName",
                "username",
                "email",
                "phone",
                "password",
                "pin",
                "isActive",
                "isLogin",
                "isResetPassword",
                "lastLogin",
                "profilePic"
            ],
            new \Phalcon\Validation\Validator\PresenceOf(
                ["message" => ":field is required"]
            )
        );

        $this->add(
            [
                "firstName",
                "lastName",
                "username",
            ],
            new \Phalcon\Validation\Validator\StringLength([
                "max" => [
                    "firstName" => 50,
                    "lastName" => 50,
                    "username" => 50,
                ],
                "min" => [
                    "firstName" => 0,
                    "lastName" => 0,
                    "username" => 0,
                ],
                "messageMaximum" => "characters :field too long, must no more or equal than :max characters.",
                "messageMinimum" => "characters :field too short, must more or equal than :min characters.",
            ])
        );

        $this->add(
            "username",
            new \Phalcon\Validation\Validator\Uniqueness([
                "model"   => new TableModel(),
                "message" => ":field already exist",
            ])
        );

        // * just for string parameter
        $this->setFilters('firstName', ['trim']);
        $this->setFilters('lastName', ['trim']);
        $this->setFilters('username', ['trim']);
        $this->setFilters('email', ['trim']);
        $this->setFilters('phone', ['trim']);
        $this->setFilters('password', ['trim']);
        $this->setFilters('pin', ['trim']);
        $this->setFilters('isActive', ['trim']);
        $this->setFilters('isLogin', ['trim']);
        $this->setFilters('isResetPassword', ['trim']);
        $this->setFilters('lastLogin', ['trim']);
        $this->setFilters('profilePic', ['trim']);
    }
}
