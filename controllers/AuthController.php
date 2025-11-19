<?php
class AuthController
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function signup($username, $password)
    {
        $result = $this->user->signup($username, $password);

        switch ($result) {
            case "exists":
                return "<script>alert('Username already taken.');</script>";
            case "success":
                return "<script>alert('Account created successfully.');</script>";
            case "error":
                return "<script>alert('Error creating account.');</script>";
        }
    }

    public function signin($username, $password)
    {
        $result = $this->user->signin($username, $password);

        switch ($result) {
            case "not_found":
                return "<script>alert('Username not found.');</script>";
            case "invalid_password":
                return "<script>alert('Incorrect password.');</script>";
            case "success":
                header("Location: /php-practitioner/home");
                exit();
        }
    }


    public function resetPassword($username, $new_password)
    {
        $result = $this->user->resetPassword($username, $new_password);

        switch ($result) {
            case "success":
                return "<script>alert('Password reset successfully.');</script>";
            case "error":
                return "<script>alert('Error resetting password.');</script>";
        }
    }


    public function deleteUser($username)
    {
        $result = $this->user->deleteUser($username);

        switch ($result) {
            case "success":
                return "<script>alert('User deleted successfully.');</script>";
            case "error":
                return "<script>alert('Error deleting user.');</script>";
        }
    }
}
