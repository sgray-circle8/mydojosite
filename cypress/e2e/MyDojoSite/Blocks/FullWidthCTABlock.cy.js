/// <reference types="cypress" />

describe('Blocks / Full Width CTA Block', () => {
    beforeEach(() => {
        cy.visit('/');
    })

    // Mobile CTA Block is visible, containing title, summary and button
    it('Mobile: CTA Block components', () => {
        cy.viewport('iphone-5');

        cy.get('h1')
            .should('be.visible')
            .and('have.class', 'cta-block__title');
        cy.get('.cta-block__summary')
            .should('be.visible');

        cy.get('.cta-block__button a.btn')
            .should('have.attr', 'href')
            .and('include', '/contact/');

        cy.get('.cta-block__button a.btn')
            .should('contain', 'Keep Going');
    })
})
