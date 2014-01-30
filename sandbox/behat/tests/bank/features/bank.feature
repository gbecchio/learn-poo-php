# featrues/bank.feature
Feature: Manage a bank account
  In order to manage my account
  As a logged in user
  I need to be able to add or take mon ey on my account

  Background:
    And I am logged in as "jeanfrancois"
    And I have "50" euro
 
  @mink:selenium
  Scenario: Check my bank account
    Then I should see "You have 50 euro on your account"

  @mink:selenium
  Scenario Outline: Add money
    Given I have "<initialAmount>" euro
    When I select "<operation>" from "Operation"
    And I fill in "Amount" with "<amount>"
    And I press "Go"
    Then I should see "You have <finalAmount> euro on your account"
 
    Examples:
    | operation   | initialAmount | amount    | finalAmount   |
    | add   | 50            | 10        | 60            |
    | add   | 50            | 20        | 70            |
    | add   | 50            | 5         | 55            |
    | add   | 50            | 0         | 50            |
    | take  | 50            | 10        | 40            |
    | take  | 50            | 20        | 30            |
    | take  | 50            | 30        | 20            |
 
  @mink:selenium
  Scenario: Overdrafts are not allowed
    Given I have "50" euro
    When I select "Take money" from "Operation"
    And I fill in "Amount" with "60"
    And I press "Go"
    #And I should see "Overdrafts are not allowed"