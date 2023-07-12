module.exports = {
  env: {
    browser: true,
    es2021: true,
  },
  extends: ['airbnb/base',
    'next/core-web-vitals',
    'plugin:prettier/recomended'],
  plugins: ['prettier'],
  rules: [
    
  ],
  overrides: [
    {
      env: {
        node: true,
      },
      files: [
        '.eslintrc.{js,cjs}',
      ],
      parserOptions: {
        sourceType: 'script',
      },
    },
  ],
  parserOptions: {
    ecmaVersion: 'latest',
    sourceType: 'module',
  },
  rules: {
  },
};
