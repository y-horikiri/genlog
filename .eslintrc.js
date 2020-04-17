module.exports = {
    "env": {
        "browser": true,
        "jquery": true,
        "es6": true,
        "node": true,
    },
    "extends": "eslint:recommended",
    "globals": {
        "Atomics": "readonly",
        "SharedArrayBuffer": "readonly"
    },
    "parser": "babel-eslint",
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
