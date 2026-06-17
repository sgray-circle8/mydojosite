/// <reference types="cypress" />

describe('Footer', () => {
  beforeEach(() => {
    cy.visit('https://graydojo.ddev.site/');
  })

  // Black Footer strip is visible on mobile, containing logo, tagline, and back-to-top button
  it('Mobile: Footer Strip', () => {
    cy.viewport('iphone-5');

    // Strip is visible and has the expected background colour
    cy.get('.footer-strip')
      .scrollIntoView()
      .should('be.visible')
      .and('have.css', 'background-color', 'rgb(17, 24, 39)');

    // Footer logo image is visible
    cy.get('.logo--footer img').should('be.visible');
    cy.get('.strip-tagline').should('be.visible');

    // Back-to-top button works as expected
    cy.get('.back-to-top').should('be.visible');
    cy.get('.back-to-top').click().wait(1000);
    cy.get('.site-header').should('be.visible');
  })

  // Mobile Footer Area
  it('Mobile: Footer Links Area', () => {
    cy.viewport('iphone-5');

    // Links area is visible
    cy.get('.footer-links-area').scrollIntoView().should('be.visible');

    // Confirm that the links area has 1 column
    cy.get('.footer-links-area')
      .invoke('css', 'grid-template-columns')
        .should((cssValue) => {
          // Split the string into an array of columns
          const columnCount = cssValue.trim().split(/\s+/).length;
          expect(columnCount).to.equal(1);
      });
  })

  // Black Footer strip is visible on desktop, containing logo, tagline, and back-to-top button
  it('Desktop: Footer Strip', () => {
    cy.viewport(1200, 480);

    cy.get('.footer-strip')
      .should('be.visible')
      .and('have.css', 'background-color', 'rgb(17, 24, 39)');
  })

})
