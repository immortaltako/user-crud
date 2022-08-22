const { assertSupportedNodeVersion } = require('./node_modules/laravel-mix/src/Engine');

module.exports = async () => {
    // @ts-ignore
    process.noDeprecation = true;

    assertSupportedNodeVersion();

    const mix = require('node_modules/laravel-mix/src/Mix').primary;

    require(mix.paths.mix());

    await mix.installDependencies();
    await mix.init();

    return mix.build();
};
