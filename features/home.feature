Feature: Home
  In order to navigate the site
  As a visitor
  I want to test navigation

  Background:
    When I go to the "Home" page

  @javascript 
  Scenario: I can see multiple links 
    Then I should see "About" link 
    And I should see "Store" link 
    And I should see "Gmail" link 
    And I should see "Images" link
    
