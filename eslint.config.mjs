import globals from "globals";
import babelParser from "babel-eslint";
import path from "node:path";
import { fileURLToPath } from "node:url";
import js from "@eslint/js";
import { FlatCompat } from "@eslint/eslintrc";

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);
const compat = new FlatCompat({
    baseDirectory: __dirname,
    recommendedConfig: js.configs.recommended,
    allConfig: js.configs.all
});

export default [{
    ignores: ["**/dist/", "**/build/"],
}, ...compat.extends("airbnb-base"), {
    languageOptions: {
        globals: {
            ...globals.browser,
            ...globals.jest,
        },

        parser: babelParser,
        ecmaVersion: 2018,
        sourceType: "module",
    },

    rules: {
        "no-shadow": "off",
        "no-param-reassign": "off",
        "eol-last": "off",

        "import/extensions": [1, {
            js: "always",
            json: "always",
        }],
    },
}];