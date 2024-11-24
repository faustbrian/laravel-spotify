<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Feature\Reference;

use BaseCodeOy\Spotify\Models\Chapter;
use BaseCodeOy\Spotify\Reference\Chapters;

test('findById', function (): void {
    $actual = fakeOkFromFixture(Chapters::class, 'chapters/get-a-chapter')->findById('');

    expect($actual)->toBeInstanceOf(Chapter::class);
});

test('findByIds', function (): void {
    $actual = fakeOkFromFixture(Chapters::class, 'chapters/get-several-chapters')->findByIds([]);

    expect($actual)->toBeDataCollection(Chapter::class);
});
