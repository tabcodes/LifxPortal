## LightPortal

LightPortal is a web application made to control your LIFX-brand "smart" (wi-fi) lightbulbs. The standard LIFX mobile app does a decent job of this, but I found it strange that there isn't an equally-usable
browser application for this purpose, so I made one!

## Components

This application was built with the  Laravel PHP framework (v5.3) for ease of use and getting started quickly with user registration/auth. Most of the client-side scripting is done in jQuery, and the site itself was
designed with Bootstrap v3 to create a semi-responsive layout (apologies for the design, I didn't have all the time in the world for this project so some sacrifices had to be made). The heavy lifting is mostly
done via interaction with the LIFX Cloud API using a custom-written library (see below).

## LIFXSwitch

The LIFXSwitch class is a custom class I wrote to handle communication between the front end of the application and the LIFX Cloud API. It's fairly simple to use and somewhat well-documented in another, separate repository.