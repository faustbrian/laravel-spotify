<?php

declare(strict_types=1);

namespace Tests\Feature\Reference;

use BombenProdukt\Spotify\Models\AudioAnalysis;
use BombenProdukt\Spotify\Models\AudioFeature;
use BombenProdukt\Spotify\Models\Track;
use BombenProdukt\Spotify\Models\TrackRecommendationsResponse;
use BombenProdukt\Spotify\Models\TrackSavedByCurrentUser;
use BombenProdukt\Spotify\Models\TrackSavedByCurrentUserResponse;
use BombenProdukt\Spotify\Reference\Tracks;
use Spatie\LaravelData\DataCollection;

test('findById', function (): void {
    $actual = fakeSequence(Tracks::class, 'tracks/get-track')->findById('');

    expect($actual)->toBeInstanceOf(Track::class);
});

test('findByIds', function (): void {
    $actual = fakeSequence(Tracks::class, 'tracks/get-several-tracks')->findByIds([]);

    expect($actual)->toBeInstanceOf(DataCollection::class);
    expect($actual->first())->toBeInstanceOf(Track::class);
});

test('savedByCurrentUser', function (): void {
    $actual = fakeSequence(Tracks::class, 'tracks/get-users-saved-tracks')->savedByCurrentUser();

    expect($actual)->toBeInstanceOf(TrackSavedByCurrentUserResponse::class);
    expect($actual->items)->toBeInstanceOf(DataCollection::class);
    expect($actual->items->first())->toBeInstanceOf(TrackSavedByCurrentUser::class);
});

test('audioFeatures', function (): void {
    $actual = fakeSequence(Tracks::class, 'tracks/get-several-audio-features')->audioFeatures();

    expect($actual)->toBeInstanceOf(DataCollection::class);
    expect($actual->first())->toBeInstanceOf(AudioFeature::class);
});

test('audioFeature', function (): void {
    $actual = fakeSequence(Tracks::class, 'tracks/get-audio-features')->audioFeature('');

    expect($actual)->toBeInstanceOf(AudioFeature::class);
});

test('audioAnalysis', function (): void {
    $actual = fakeSequence(Tracks::class, 'tracks/get-audio-analysis')->audioAnalysis('');

    expect($actual)->toBeInstanceOf(AudioAnalysis::class);
});

test('recommendations', function (): void {
    $actual = fakeSequence(Tracks::class, 'tracks/get-recommendations')->recommendations();

    expect($actual)->toBeInstanceOf(TrackRecommendationsResponse::class);
});
