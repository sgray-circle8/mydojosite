/// <reference types="cypress" />

describe('Header / Nav', () => {
  beforeEach(() => {
    cy.visit('https://graydojo.ddev.site/');
  })

  // Mobile header is visible, containing logo and title
  it('Mobile: Header', () => {
    cy.viewport('iphone-5');

    cy.get('.site-header').should('be.visible');
    cy.get('.brand').should('be.visible');
    cy.get('.site-header__logo').should('be.visible');
    cy.get('.site-title').should('be.visible');
  })

  /*
   * Mobile nav is initially not visible.
   * The burger menu should be visible. Clicking on it reveals the mobile nav menu.
   */
  it('Mobile: Nav', () => {
    cy.viewport('iphone-5');

    // Nav menu should not be visible
    cy.get('#mainNav').should('not.be.visible');

    // Burger menu should be visible but not active
    cy.get('#menuBtn').should('be.visible');
    cy.get('#menuBtn').should('not.have.class', 'active');

    // Click the burger menu to activate the mobile nav
    cy.get('#menuBtn').click();

    // Burger menu should be visible / active and contain 7 nav items
    cy.get('#menuBtn').should('have.class', 'active');
    cy.get('#mainNav').should('be.visible');
    cy.get('#mainNav a').should('have.length', 7);

    // Click the burger menu to close the mobile nav
    cy.get('#menuBtn').click();

    // Nav menu should once again not be visible
    cy.get('#mainNav').should('not.be.visible');

    // Burger menu should once again be visible but not active
    cy.get('#menuBtn').should('be.visible');
    cy.get('#menuBtn').should('not.have.class', 'active');
  })
})
