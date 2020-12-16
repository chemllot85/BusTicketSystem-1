<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## About the Project

a Bus booking system has an CRUD System so the the admin can Manage

- stops
- Routes/lines
- Buses
- Seats

## relational database

- one-to-many between [Route,Bus] , [Bus,Seat]
- many-to-many between [Routes,Stops]

## Middleware 

- is_admin middleware for admin URLs
-islogged Middleware for user to check first if the user has logged in before booking the seat 

## user

- user can see the available trips for his start and end point a
- can select his prefered bus
- then he can book the avilable seat
