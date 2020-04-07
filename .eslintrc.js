module.exports = {
    "env": {
        "browser": true,
        "jquery": true,
        "es6": true
    },
    "extends": "eslint:recommended",
    "globals": {
        "Atomics": "readonly",
        "SharedArrayBuffer": "readonly"
    },
    "parserOptions": {
        "ecmaVersion": 6,
        "sourceType": "module"
    },
    "root": true,
    "rules": {
        "semi": ["error"],
        "no-var": ["error"],
        "no-unused-vars": 1,
    }
};
