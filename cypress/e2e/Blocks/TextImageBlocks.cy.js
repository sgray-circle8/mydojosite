/// <reference types="cypress" />

describe('Blocks / Home Page Text and Image Blocks', () => {
  beforeEach(() => {
    cy.visit('/');
  });

  it('renders text blocks with titles, subtitles, and action links', () => {
    cy.viewport(1200, 900);

    cy.get('.card.text-block').should('have.length.at.least', 6);

    cy.contains('.card.text-block h2', 'This Text Block').should('be.visible');
    cy.contains('.card.text-block h2', 'Another Text Block').should('be.visible');
    cy.contains('.card.text-block h2', 'Text Block 3').should('be.visible');
    cy.contains('.card.text-block h2', 'RANDOM!').should('be.visible');
    cy.contains('.card.text-block h2', 'Random Quotes').should('be.visible');

    cy.contains('.card.text-block h4', '... but with a SubTitle!').should('be.visible');
    cy.contains('.card.text-block h2', 'Another Text Block').parent().should('have.class', 'red-bg');

    cy.contains('.card.text-block', 'This Text Block')
      .find('a[href="/about/"]')
      .should('be.visible')
      .and('contain.text', 'Learn more');

    cy.contains('.card.text-block', 'Text Block 3')
      .find('a[href="/training/"]')
      .should('be.visible')
      .and('contain.text', 'Jump in');

    cy.contains('.card.text-block', 'Random Quotes')
      .find('h4')
      .should('contain.text', 'Available on text blocks');
  });

  it('renders image blocks with responsive images and the expected column layouts', () => {
    cy.viewport(1200, 900);

    cy.get('.card.image-block').should('have.length.at.least', 4);

    cy.get('.card.image-block.image-block--one-column')
      .find('img.img-responsive[alt="OneColumn Alcove"]')
      .should('be.visible');

    cy.get('.card.image-block.image-block--two-column')
      .find('img.img-responsive[alt="TwoColumn Training Dojo"]')
      .should('be.visible');

    cy.get('.card.image-block.image-block--one-column')
      .find('img.img-responsive[alt="OneColumn Castle 1"]')
      .should('be.visible');

    cy.get('.card.image-block.image-block--two-column')
      .find('img.img-responsive[alt="TwoColumn Training Outdoor"]')
      .should('be.visible');
  });
});
