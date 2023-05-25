<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BombenProdukt\Spotify\Models\AudioAnalysis;
use BombenProdukt\Spotify\Models\AudioFeature;
use BombenProdukt\Spotify\Models\Recommendations;
use BombenProdukt\Spotify\Models\SavedTrack;
use BombenProdukt\Spotify\Models\SavedTrackPage;
use BombenProdukt\Spotify\Models\Track;
use BombenProdukt\Spotify\Reference\Tracks;

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
