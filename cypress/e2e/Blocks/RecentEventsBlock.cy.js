/// <reference types="cypress" />

describe('Blocks / Recent Events Block', () => {
  beforeEach(() => {
    cy.visit('/');
  });

  it('Recent Events Block appears and has links to Events Listing Page', () => {
    cy.viewport(1200, 900);

    cy.get('.vue-recent-events-block').should('be.visible');
    cy.get('.recent-events-block').should('be.visible');
    cy.get('.recent-events-block__linked-page').should('have.length.at.least', 1);
    cy.get('.recent-events-block__linked-page').first().should('contain.text', 'See all events');
    cy.get('.vue-recent-events-block').should('have.attr', 'data-linkedpageurl', 'events');
  });

  it('Past events have muted Title and Subtitle colour', () => {
    cy.viewport(1200, 900);

    // Find the recent-event that contains the past-event subtitle text
    cy.get('.recent-event__start-date').contains('This event has already taken place').closest('.recent-event').as('pastEvent');

    // Title inside that event should have the past-event class
    cy.get('@pastEvent').find('.recent-event__link').first().should('have.class', 'text-image-block__text-title--past-event');

    // The title's computed color should match the theme muted color
    cy.get('body').then(($body) => {
      const mutedRaw = getComputedStyle($body[0]).getPropertyValue('--muted').trim();
      // Normalize any CSS color value (hex or var) to computed RGB using a temporary element
      cy.document().then((doc) => {
        const tmp = doc.createElement('div');
        tmp.style.color = mutedRaw;
        doc.body.appendChild(tmp);
        const mutedRgb = getComputedStyle(tmp).color;
        doc.body.removeChild(tmp);

        cy.get('@pastEvent').find('.recent-event__link').first().then($title => {
          const titleColor = getComputedStyle($title[0]).color;
          expect(titleColor).to.equal(mutedRgb);
        });
      });
    });
  });
});
