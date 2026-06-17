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
   * The burger menu should be visible. Clicking on it reveals
   * the mobile nav menu, which contains 7 nav item links.
   * When the the mobile nav menu is open, the menu button becomes 'active'.
   * When the active menu button is clicked, the mobile nav menu disappears
   * and the menu button returns to its original state.
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

    // Click the menu button to close the mobile nav
    cy.get('#menuBtn').click();

    // Nav menu should once again not be visible
    cy.get('#mainNav').should('not.be.visible');

    // Burger menu should once again be visible but not active
    cy.get('#menuBtn').should('be.visible');
    cy.get('#menuBtn').should('not.have.class', 'active');
  })

  // Desktop header is visible, containing logo and title
  it('Desktop: Header', () => {
    cy.viewport(1200, 480);

    cy.get('.site-header').should('be.visible');
    cy.get('.brand').should('be.visible');
    cy.get('.site-header__logo').should('be.visible');
    cy.get('.site-title').should('be.visible');
  })

  // Desktop nav is visible, containing 7 nav item links
  it('Desktop: Nav', () => {
    cy.viewport(1200, 480);

    // Mobile menu button should not be visible
    cy.get('#menuBtn').should('not.be.visible');

    cy.get('#mainNav').should('be.visible');
    cy.get('#mainNav a').should('have.length', 7);
  })
})
