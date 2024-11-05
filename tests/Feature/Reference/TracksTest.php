<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BaseCodeOy\Spotify\Models\AudioAnalysis;
use BaseCodeOy\Spotify\Models\AudioFeature;
use BaseCodeOy\Spotify\Models\Recommendations;
use BaseCodeOy\Spotify\Models\SavedTrack;
use BaseCodeOy\Spotify\Models\SavedTrackPage;
use BaseCodeOy\Spotify\Models\Track;
use BaseCodeOy\Spotify\Reference\Tracks;

test('findById', function (): void {
    $actual = fakeOkFromFixture(Tracks::class, 'tracks/get-track')->findById('');

    expect($actual)->toBeInstanceOf(Track::class);
});

test('findByIds', function (): void {
    $actual = fakeOkFromFixture(Tracks::class, 'tracks/get-several-tracks')->findByIds([]);

    expect($actual)->toBeDataCollection(Track::class);
});

test('savedByCurrentUser', function (): void {
    $actual = fakeOkFromFixture(Tracks::class, 'tracks/get-users-saved-tracks')->savedByCurrentUser();

    expect($actual)->toBePage(SavedTrackPage::class, SavedTrack::class);
});

test('audioFeatures', function (): void {
    $actual = fakeOkFromFixture(Tracks::class, 'tracks/get-several-audio-features')->audioFeatures();

    expect($actual)->toBeDataCollection(AudioFeature::class);
});

test('audioFeature', function (): void {
    $actual = fakeOkFromFixture(Tracks::class, 'tracks/get-audio-features')->audioFeature('');

    expect($actual)->toBeInstanceOf(AudioFeature::class);
});

test('audioAnalysis', function (): void {
    $actual = fakeOkFromFixture(Tracks::class, 'tracks/get-audio-analysis')->audioAnalysis('');

    expect($actual)->toBeInstanceOf(AudioAnalysis::class);
});

test('recommendations', function (): void {
    $actual = fakeOkFromFixture(Tracks::class, 'tracks/get-recommendations')->recommendations();

    expect($actual)->toBeInstanceOf(Recommendations::class);
});
