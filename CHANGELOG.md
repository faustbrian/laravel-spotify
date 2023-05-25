# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]


## [1.5.4] - 2023-05-25
### Fixed
- use `q` instead of `query` for `search`
- always include query parameters in every request


## [1.5.2] - 2023-05-25
### Fixed
- mark nullable properties according to spec


## [1.5.1] - 2023-05-25
### Fixed
- adjust nullable properties for player states


## [1.5.0] - 2023-05-25
### Added
- implement Laravel Socialite provider for authentication


## [1.4.2] - 2023-05-25
### Fixed
- replace unused `Tracks` model with `TrackPage`


## [1.4.1] - 2023-05-25
### Fixed
- use `CurrentlyPlaying` model for `currentlyPlaying` function


## [1.4.0] - 2023-05-25

## [1.3.0] - 2023-05-24
### Fixed
- throw `RuntimeException` when response contains `error` object
- mark nullable properties according to spec


## [1.2.3] - 2023-05-24
### Fixed
- possibly empty values when looking up currently playing track


## [1.2.2] - 2023-05-24
### Fixed
- handling of empty responses


## [1.2.1] - 2023-05-24

## [1.2.0] - 2023-05-24
### Added
- return typed DTOs for player
- return typed DTOs for playlists
- return typed DTOs for searches
- return typed DTOs for shows
- return typed DTOs for tracks
- return typed DTOs for users
- return typed DTOs for episodes
- return typed DTOs for chapters
- return typed DTOs for categories
- return typed DTOs for audiobooks
- return typed DTOs for albums and artists
- add DTOs to represent response data (unused as of now)

### Fixed
- adjust status code checks (varies between 200, 201 and 204)


## [1.1.0] - 2023-05-22

## [1.0.2] - 2023-05-22
### Fixed
- configuration name for manager instances


## [1.0.1] - 2023-05-22
### Added
- allow setting bearer token at runtime


## 1.0.0 - 2023-05-22

[Unreleased]: https://github.com/BombenProdukt/package_slug/compare/1.5.4...HEAD
[1.5.4]: https://github.com/BombenProdukt/package_slug/compare/1.5.2...1.5.4
[1.5.2]: https://github.com/BombenProdukt/package_slug/compare/1.5.1...1.5.2
[1.5.1]: https://github.com/BombenProdukt/package_slug/compare/1.5.0...1.5.1
[1.5.0]: https://github.com/BombenProdukt/package_slug/compare/1.4.2...1.5.0
[1.4.2]: https://github.com/BombenProdukt/package_slug/compare/1.4.1...1.4.2
[1.4.1]: https://github.com/BombenProdukt/package_slug/compare/1.4.0...1.4.1
[1.4.0]: https://github.com/BombenProdukt/package_slug/compare/1.3.0...1.4.0
[1.3.0]: https://github.com/BombenProdukt/package_slug/compare/1.2.3...1.3.0
[1.2.3]: https://github.com/BombenProdukt/package_slug/compare/1.2.2...1.2.3
[1.2.2]: https://github.com/BombenProdukt/package_slug/compare/1.2.1...1.2.2
[1.2.1]: https://github.com/BombenProdukt/package_slug/compare/1.2.0...1.2.1
[1.2.0]: https://github.com/BombenProdukt/package_slug/compare/1.1.0...1.2.0
[1.1.0]: https://github.com/BombenProdukt/package_slug/compare/1.0.2...1.1.0
[1.0.2]: https://github.com/BombenProdukt/package_slug/compare/1.0.1...1.0.2
[1.0.1]: https://github.com/BombenProdukt/package_slug/compare/1.0.0...1.0.1
