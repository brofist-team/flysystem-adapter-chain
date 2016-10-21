Flysystem Adapter Chain
-----------------

Adapter Chain, so the same method can be called in multiple adapters

Code information:

[![Build Status](https://travis-ci.org/brofist-team/flysystem-adapter-chain.png?branch=master)](https://travis-ci.org/brofist-team/flysystem-adapter-chain)
[![Coverage Status](https://coveralls.io/repos/brofist-team/flysystem-adapter-chain/badge.png?branch=master)](https://coveralls.io/r/brofist-team/flysystem-adapter-chain?branch=master)
[![Code Coverage Scrutinizer](https://scrutinizer-ci.com/g/brofist-team/flysystem-adapter-chain/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/brofist-team/flysystem-adapter-chain/?branch=master)
[![Code Climate](https://codeclimate.com/github/brofist-team/flysystem-adapter-chain/badges/gpa.svg)](https://codeclimate.com/github/brofist-team/flysystem-adapter-chain)
[![Issue Count](https://codeclimate.com/github/brofist-team/flysystem-adapter-chain/badges/issue_count.svg)](https://codeclimate.com/github/brofist-team/flysystem-adapter-chain)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/brofist-team/flysystem-adapter-chain/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/brofist-team/flysystem-adapter-chain/?branch=master)
[![StyleCI](https://styleci.io/repos/71474560/shield)](https://styleci.io/repos/71474560)

Package information:

[![Latest Stable Version](https://poser.pugx.org/brofist/flysystem-adapter-chain/v/stable.svg)](https://packagist.org/packages/brofist/flysystem-adapter-chain)
[![Total Downloads](https://poser.pugx.org/brofist/flysystem-adapter-chain/downloads.svg)](https://packagist.org/packages/brofist/flysystem-adapter-chain)
[![Latest Unstable Version](https://poser.pugx.org/brofist/flysystem-adapter-chain/v/unstable.svg)](https://packagist.org/packages/brofist/flysystem-adapter-chain)
[![License](https://poser.pugx.org/brofist/flysystem-adapter-chain/license.svg)](https://packagist.org/packages/brofist/flysystem-adapter-chain)
[![Dependency Status](https://gemnasium.com/badges/github.com/brofist-team/flysystem-adapter-chain.svg)](https://gemnasium.com/github.com/brofist-team/flysystem-adapter-chain)


## Usage


```php
<?php

use League\Flysystem\Filesystem;
use Brofist\Flysystem\Adapter\Chain;

$chain = new Chain([$localAdapter]);
$chain->append($ftpAdapter);

$filesystem = new Filesystem($chain);
$filesystem->write('path', 'contents'); // will write locally and to the ftp
```

## Installing

```bash
composer require brofist/filesystem-adapter-chain
```

## Issues/Features proposals

[Here](https://github.com/brofist-team/flysystem-adapter-chain/issues) is the issue tracker.

## Lincense

[MIT](MIT-LICENSE)

## Authors

- [Marcelo Jacobus](https://github.com/mjacobus)
- [mihhac](https://github.com/mihhac)
