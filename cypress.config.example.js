import { defineConfig } from "cypress";

export default defineConfig({
  e2e: {
    baseUrl: 'https://mydojosite.ddev.site/',
    setupNodeEvents(on, config) {
      // implement node event listeners here
    },
  },
});
