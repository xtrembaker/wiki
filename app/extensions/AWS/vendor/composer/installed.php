<?php return array(
    'root' => array(
        'name' => 'edwardspec/mediawiki-aws-s3',
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'reference' => NULL,
        'type' => 'mediawiki-extension',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'aws/aws-crt-php' => array(
            'pretty_version' => 'v1.0.4',
            'version' => '1.0.4.0',
            'reference' => 'f5c64ee7c5fce196e2519b3d9b7138649efe032d',
            'type' => 'library',
            'install_path' => __DIR__ . '/../aws/aws-crt-php',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'aws/aws-sdk-php' => array(
            'pretty_version' => '3.259.0',
            'version' => '3.259.0.0',
            'reference' => '096711644ebe5c956a97ef449fa2cb3b66443c25',
            'type' => 'library',
            'install_path' => __DIR__ . '/../aws/aws-sdk-php',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'composer/installers' => array(
            'pretty_version' => 'v1.12.0',
            'version' => '1.12.0.0',
            'reference' => 'd20a64ed3c94748397ff5973488761b22f6d3f19',
            'type' => 'composer-plugin',
            'install_path' => __DIR__ . '/./installers',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'composer/pcre' => array(
            'pretty_version' => '1.0.1',
            'version' => '1.0.1.0',
            'reference' => '67a32d7d6f9f560b726ab25a061b38ff3a80c560',
            'type' => 'library',
            'install_path' => __DIR__ . '/./pcre',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'composer/semver' => array(
            'pretty_version' => '3.3.2',
            'version' => '3.3.2.0',
            'reference' => '3953f23262f2bff1919fc82183ad9acb13ff62c9',
            'type' => 'library',
            'install_path' => __DIR__ . '/./semver',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'composer/spdx-licenses' => array(
            'pretty_version' => '1.5.7',
            'version' => '1.5.7.0',
            'reference' => 'c848241796da2abf65837d51dce1fae55a960149',
            'type' => 'library',
            'install_path' => __DIR__ . '/./spdx-licenses',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'composer/xdebug-handler' => array(
            'pretty_version' => '2.0.5',
            'version' => '2.0.5.0',
            'reference' => '9e36aeed4616366d2b690bdce11f71e9178c579a',
            'type' => 'library',
            'install_path' => __DIR__ . '/./xdebug-handler',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'edwardspec/mediawiki-aws-s3' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'reference' => NULL,
            'type' => 'mediawiki-extension',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'felixfbecker/advanced-json-rpc' => array(
            'pretty_version' => 'v3.2.1',
            'version' => '3.2.1.0',
            'reference' => 'b5f37dbff9a8ad360ca341f3240dc1c168b45447',
            'type' => 'library',
            'install_path' => __DIR__ . '/../felixfbecker/advanced-json-rpc',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'grogy/php-parallel-lint' => array(
            'dev_requirement' => true,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'guzzlehttp/guzzle' => array(
            'pretty_version' => '7.5.0',
            'version' => '7.5.0.0',
            'reference' => 'b50a2a1251152e43f6a37f0fa053e730a67d25ba',
            'type' => 'library',
            'install_path' => __DIR__ . '/../guzzlehttp/guzzle',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'guzzlehttp/promises' => array(
            'pretty_version' => '1.5.2',
            'version' => '1.5.2.0',
            'reference' => 'b94b2807d85443f9719887892882d0329d1e2598',
            'type' => 'library',
            'install_path' => __DIR__ . '/../guzzlehttp/promises',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'guzzlehttp/psr7' => array(
            'pretty_version' => '2.4.3',
            'version' => '2.4.3.0',
            'reference' => '67c26b443f348a51926030c83481b85718457d3d',
            'type' => 'library',
            'install_path' => __DIR__ . '/../guzzlehttp/psr7',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'jakub-onderka/php-console-color' => array(
            'dev_requirement' => true,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'jakub-onderka/php-console-highlighter' => array(
            'dev_requirement' => true,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'jakub-onderka/php-parallel-lint' => array(
            'dev_requirement' => true,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'mediawiki/mediawiki-codesniffer' => array(
            'pretty_version' => 'v38.0.0',
            'version' => '38.0.0.0',
            'reference' => '059db7ef17adf2fd1088c42a05e6736e5c2aab2a',
            'type' => 'phpcodesniffer-standard',
            'install_path' => __DIR__ . '/../mediawiki/mediawiki-codesniffer',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'mediawiki/mediawiki-phan-config' => array(
            'pretty_version' => '0.11.0',
            'version' => '0.11.0.0',
            'reference' => 'e1891169976e0f8062a06c851687b32cf91b980e',
            'type' => 'library',
            'install_path' => __DIR__ . '/../mediawiki/mediawiki-phan-config',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'mediawiki/minus-x' => array(
            'pretty_version' => '1.1.0',
            'version' => '1.1.0.0',
            'reference' => '8f39ade171004eb897d80e53266ba2ba542b24d0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../mediawiki/minus-x',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'mediawiki/phan-taint-check-plugin' => array(
            'pretty_version' => '3.3.2',
            'version' => '3.3.2.0',
            'reference' => '6d38c59222ede306773ec2baac8d78843478a360',
            'type' => 'library',
            'install_path' => __DIR__ . '/../mediawiki/phan-taint-check-plugin',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'microsoft/tolerant-php-parser' => array(
            'pretty_version' => 'v0.1.2',
            'version' => '0.1.2.0',
            'reference' => '3eccfd273323aaf69513e2f1c888393f5947804b',
            'type' => 'library',
            'install_path' => __DIR__ . '/../microsoft/tolerant-php-parser',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'mtdowling/jmespath.php' => array(
            'pretty_version' => '2.6.1',
            'version' => '2.6.1.0',
            'reference' => '9b87907a81b87bc76d19a7fb2d61e61486ee9edb',
            'type' => 'library',
            'install_path' => __DIR__ . '/../mtdowling/jmespath.php',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'netresearch/jsonmapper' => array(
            'pretty_version' => 'v4.1.0',
            'version' => '4.1.0.0',
            'reference' => 'cfa81ea1d35294d64adb9c68aa4cb9e92400e53f',
            'type' => 'library',
            'install_path' => __DIR__ . '/../netresearch/jsonmapper',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'phan/phan' => array(
            'pretty_version' => '5.2.0',
            'version' => '5.2.0.0',
            'reference' => 'eb59e65097dc8035fdaaa66db4b565585decceb0',
            'type' => 'project',
            'install_path' => __DIR__ . '/../phan/phan',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'php-parallel-lint/php-console-color' => array(
            'pretty_version' => 'v0.3',
            'version' => '0.3.0.0',
            'reference' => 'b6af326b2088f1ad3b264696c9fd590ec395b49e',
            'type' => 'library',
            'install_path' => __DIR__ . '/../php-parallel-lint/php-console-color',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'php-parallel-lint/php-console-highlighter' => array(
            'pretty_version' => 'v0.5',
            'version' => '0.5.0.0',
            'reference' => '21bf002f077b177f056d8cb455c5ed573adfdbb8',
            'type' => 'library',
            'install_path' => __DIR__ . '/../php-parallel-lint/php-console-highlighter',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'php-parallel-lint/php-parallel-lint' => array(
            'pretty_version' => 'v1.2.0',
            'version' => '1.2.0.0',
            'reference' => '474f18bc6cc6aca61ca40bfab55139de614e51ca',
            'type' => 'library',
            'install_path' => __DIR__ . '/../php-parallel-lint/php-parallel-lint',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'phpdocumentor/reflection-common' => array(
            'pretty_version' => '2.2.0',
            'version' => '2.2.0.0',
            'reference' => '1d01c49d4ed62f25aa84a747ad35d5a16924662b',
            'type' => 'library',
            'install_path' => __DIR__ . '/../phpdocumentor/reflection-common',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'phpdocumentor/reflection-docblock' => array(
            'pretty_version' => '5.3.0',
            'version' => '5.3.0.0',
            'reference' => '622548b623e81ca6d78b721c5e029f4ce664f170',
            'type' => 'library',
            'install_path' => __DIR__ . '/../phpdocumentor/reflection-docblock',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'phpdocumentor/type-resolver' => array(
            'pretty_version' => '1.6.2',
            'version' => '1.6.2.0',
            'reference' => '48f445a408c131e38cab1c235aa6d2bb7a0bb20d',
            'type' => 'library',
            'install_path' => __DIR__ . '/../phpdocumentor/type-resolver',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'psr/container' => array(
            'pretty_version' => '2.0.2',
            'version' => '2.0.2.0',
            'reference' => 'c71ecc56dfe541dbd90c5360474fbc405f8d5963',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/container',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'psr/http-client' => array(
            'pretty_version' => '1.0.1',
            'version' => '1.0.1.0',
            'reference' => '2dfb5f6c5eff0e91e20e913f8c5452ed95b86621',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/http-client',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'psr/http-client-implementation' => array(
            'dev_requirement' => false,
            'provided' => array(
                0 => '1.0',
            ),
        ),
        'psr/http-factory' => array(
            'pretty_version' => '1.0.1',
            'version' => '1.0.1.0',
            'reference' => '12ac7fcd07e5b077433f5f2bee95b3a771bf61be',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/http-factory',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'psr/http-factory-implementation' => array(
            'dev_requirement' => false,
            'provided' => array(
                0 => '1.0',
            ),
        ),
        'psr/http-message' => array(
            'pretty_version' => '1.0.1',
            'version' => '1.0.1.0',
            'reference' => 'f6561bf28d520154e4b0ec72be95418abe6d9363',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/http-message',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'psr/http-message-implementation' => array(
            'dev_requirement' => false,
            'provided' => array(
                0 => '1.0',
            ),
        ),
        'psr/log' => array(
            'pretty_version' => '2.0.0',
            'version' => '2.0.0.0',
            'reference' => 'ef29f6d262798707a9edd554e2b82517ef3a9376',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/log',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'psr/log-implementation' => array(
            'dev_requirement' => true,
            'provided' => array(
                0 => '1.0|2.0',
            ),
        ),
        'ralouphie/getallheaders' => array(
            'pretty_version' => '3.0.3',
            'version' => '3.0.3.0',
            'reference' => '120b605dfeb996808c31b6477290a714d356e822',
            'type' => 'library',
            'install_path' => __DIR__ . '/../ralouphie/getallheaders',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'roundcube/plugin-installer' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'sabre/event' => array(
            'pretty_version' => '5.1.4',
            'version' => '5.1.4.0',
            'reference' => 'd7da22897125d34d7eddf7977758191c06a74497',
            'type' => 'library',
            'install_path' => __DIR__ . '/../sabre/event',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'shama/baton' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => '*',
            ),
        ),
        'squizlabs/php_codesniffer' => array(
            'pretty_version' => '3.6.1',
            'version' => '3.6.1.0',
            'reference' => 'f268ca40d54617c6e06757f83f699775c9b3ff2e',
            'type' => 'library',
            'install_path' => __DIR__ . '/../squizlabs/php_codesniffer',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/console' => array(
            'pretty_version' => 'v5.4.19',
            'version' => '5.4.19.0',
            'reference' => 'dccb8d251a9017d5994c988b034d3e18aaabf740',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/console',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/deprecation-contracts' => array(
            'pretty_version' => 'v3.2.0',
            'version' => '3.2.0.0',
            'reference' => '1ee04c65529dea5d8744774d474e7cbd2f1206d3',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/deprecation-contracts',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'symfony/polyfill-ctype' => array(
            'pretty_version' => 'v1.27.0',
            'version' => '1.27.0.0',
            'reference' => '5bbc823adecdae860bb64756d639ecfec17b050a',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-ctype',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/polyfill-intl-grapheme' => array(
            'pretty_version' => 'v1.27.0',
            'version' => '1.27.0.0',
            'reference' => '511a08c03c1960e08a883f4cffcacd219b758354',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-intl-grapheme',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/polyfill-intl-normalizer' => array(
            'pretty_version' => 'v1.27.0',
            'version' => '1.27.0.0',
            'reference' => '19bd1e4fcd5b91116f14d8533c57831ed00571b6',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-intl-normalizer',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/polyfill-mbstring' => array(
            'pretty_version' => 'v1.27.0',
            'version' => '1.27.0.0',
            'reference' => '8ad114f6b39e2c98a8b0e3bd907732c207c2b534',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-mbstring',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'symfony/polyfill-php73' => array(
            'pretty_version' => 'v1.27.0',
            'version' => '1.27.0.0',
            'reference' => '9e8ecb5f92152187c4799efd3c96b78ccab18ff9',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-php73',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/polyfill-php80' => array(
            'pretty_version' => 'v1.27.0',
            'version' => '1.27.0.0',
            'reference' => '7a6ff3f1959bb01aefccb463a0f2cd3d3d2fd936',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/polyfill-php80',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/service-contracts' => array(
            'pretty_version' => 'v3.2.0',
            'version' => '3.2.0.0',
            'reference' => 'aac98028c69df04ee77eb69b96b86ee51fbf4b75',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/service-contracts',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'symfony/string' => array(
            'pretty_version' => 'v6.2.5',
            'version' => '6.2.5.0',
            'reference' => 'b2dac0fa27b1ac0f9c0c0b23b43977f12308d0b0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../symfony/string',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'tysonandre/var_representation_polyfill' => array(
            'pretty_version' => '0.1.3',
            'version' => '0.1.3.0',
            'reference' => 'e9116c2c352bb0835ca428b442dde7767c11ad32',
            'type' => 'library',
            'install_path' => __DIR__ . '/../tysonandre/var_representation_polyfill',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'webmozart/assert' => array(
            'pretty_version' => '1.11.0',
            'version' => '1.11.0.0',
            'reference' => '11cb2199493b2f8a3b53e7f19068fc6aac760991',
            'type' => 'library',
            'install_path' => __DIR__ . '/../webmozart/assert',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
    ),
);