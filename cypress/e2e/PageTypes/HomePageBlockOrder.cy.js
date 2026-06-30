/// <reference types="cypress" />

describe('Blocks / Home Page Block Order and Mobile Stacking', () => {
  beforeEach(() => {
    cy.visit('/');
  });

  it('preserves the homepage block sequence on desktop', () => {
    cy.viewport(1200, 900);

    cy.get('.cta-block').should('be.visible');
    cy.get('.blocks-wrapper > .card').should('have.length', 10);

    cy.get('.blocks-wrapper > .card').then(($cards) => {
      const expected = [
        'This Text Block',
        'OneColumn Alcove',
        'Another Text Block',
        'TwoColumn Training Dojo',
        'Text Block 3',
        'RANDOM!',
        'Random Quotes',
        'OneColumn Castle 1',
        'Next Text Block',
        'TwoColumn Training Outdoor',
      ];

      expect($cards).to.have.length(expected.length);
      expected.forEach((label, index) => {
        const card = $cards.eq(index);
        if (label.includes('Column') || label.includes('Dojo') || label.includes('Castle')) {
          cy.wrap(card)
            .find('img.img-responsive')
            .should('have.attr', 'alt')
            .and('equal', label);
        } else {
          cy.wrap(card).find('h2').should('contain.text', label);
        }
      });
    });
  });

  it('stacks all homepage blocks in a single column on mobile', () => {
    cy.viewport('iphone-5');

    cy.get('.blocks-wrapper').should('be.visible');
    cy.get('.blocks-wrapper').then(($wrapper) => {
      const computed = getComputedStyle($wrapper[0]).getPropertyValue('grid-template-columns').trim();
      const columns = computed.split(/\s+/).filter(Boolean);
      expect(columns).to.have.length(1);
    });

    cy.get('.blocks-wrapper > .card').each(($card) => {
      cy.wrap($card).should('be.visible');
      cy.wrap($card).then((cardEl) => {
        const style = getComputedStyle(cardEl[0]);
        expect(style.width).to.not.equal('0px');
      });
    });
  });
});
