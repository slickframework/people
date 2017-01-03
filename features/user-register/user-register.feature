Feature: User registration
  In order to have an user account
  As a developer
  I need to create a register command with user name, e-mail and password.

  Scenario: Register user account
    Given I have a "Service\Command\UserRegistration" command with:
      | name     | John Doe             |
      | email    | john.doe@example.com |
      | password | secret               |
    When I execute command
    Then I should have an "Account" object