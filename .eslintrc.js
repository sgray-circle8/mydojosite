module.exports = {
    root: true,
    env: {
        node: true,
        browser: true,
        jquery: true,
    },
    extends: [
        'airbnb-base',
        'plugin:vue/vue3-recommended',
        'prettier',
    ],
    parserOptions: {
        parser: '@babel/eslint-parser',
        requireConfigFile: false,
    },
    rules: {
        'no-console': process.env.NODE_ENV === 'production' ? 'warn' : 'off',
        'no-debugger': process.env.NODE_ENV === 'production' ? 'warn' : 'off',
        'import/no-unresolved': 'off',
    },
};