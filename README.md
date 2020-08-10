# GraphQL weather api

This api will return the weather data for given location (lat/lon), data is fetched from openweathermap.org <br />
It's based on Laravel framework and the GraphQLite 4 library.

## Instalation
Checkout the repo and run composer install.
Run "php artisan serve" to test the application on http://127.0.0.1:8000/graphql-playground

## Example query:
```
query {
  location(lat: 51.0543 lon: 3.7174) {
    lat
    lon
    timezone
    timezone_offset
    current {
      dt
      sunrise
      sunset
      temp
      feels_like
      pressure
      humidity
      dew_point
      uvi
      clouds
      visibility
      wind_speed
      wind_deg
      weather {
        id
        main
        description
        icon
      }
    }
  }
}
```