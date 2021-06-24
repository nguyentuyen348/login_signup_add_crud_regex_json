<?php


class Validate
{

    public static function checkUsername($username)
    {
        $pattern = "/^[A-Za-z]{6,}$/";

        if (!preg_match($pattern, $username)) {
            session_start();
            $_SESSION['username'] = "Username sai roi";
            return false;
        }
        return true;
    }

    public static function checkEmail($email)
    {
        $pattern = "/^[^\s@]+@[^\s@]+$/";
        if (!preg_match($pattern, $email)) {
            session_start();
            $_SESSION['email'] = "Email sai roi";
            return false;
        }
        return true;
    }

    public static function checkPassword($password)
    {
        $pattern = "/^([0-9]){8,}$/";
        if (!preg_match($pattern, $password)) {
            session_start();
            $_SESSION['password'] = "Password sai roi";
            return false;
        }
        return true;
    }
}