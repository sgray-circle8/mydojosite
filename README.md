# graydojo.org website: A Silverstripe 6 Project

A personal martial arts website converted into a shareable,
open-source Silverstripe CMS project.

## Features:
- Page Types:
  - Home page
  - Content page
  - Event listing page
  - Contact page
  - Testimonials page
- Elemental Blocks:
  - Full-width CTA block
  - Text block
  - Text + image block
  - Video Text block
  - Image block
  - Recent events block
- Data Models:
  - Quotes (used in optional random quote feature in text block)
  - Testimonials (used on Testimonials / "Kudos" page)
  - Events:
    - Events
    - Hosts
    - Locations
    - Vendors
    - Services

## Installation
#### 1. Set up initial environment variables
`cp .env.example .env`

#### 2. Config and start a virtual server, such as ddev
`ddev config`

`ddev start`

#### 3. Install the project
`ddev composer install`

#### 4. Expose the vendor assets for public consumption
`ddev composer vendor-expose`

#### 5. Build the front end
`nvm use`

`yarn`

`yarn dev`

#### 6. Build the back end
`ddev sake dev/build`

#### 7. Access the front end at the url given for `SS_HOST` in the `.env` file
https://mydojosite.ddev.site

## Current version: 4.0.0
- Silverstripe CMS 6.1
- Responsive design refresh with scss / bem

## Breakpoints
- 1200px  // Desktop
- 992px   // Tablet Large
- 768px   // Tablet Small
- < 768px // Mobile

## Common Components
### Logos
The logo used in both the header and footer is the same svg file,
whose path is hard-coded in the header and footer templates.  Using svg 
allows the same file to be used for both logos, however the CMS prevents
upload of svg files, which is why the path is hard-coded.

### Header
- Logo
- Nav Bar
  - Nav Item

### Footer
- Site Map (2 Col)
- Contacts
  - Email
  - URL
  - Location

## Page Types
- Home Page
- Content Page
  - "About", "Training", "Mentors"

- Event Listing Page
  - Page Title h1
  - List Events descending StartDate
  - For each Event
      - Full-width card 
      - Date @ Time - Date @ Time
        - If no EndDate or if EndDate == StartDate, omit EndDate
      - Title (h2 or h3), linked to Event Page
      - Summary (truncated to x characters if needed)

- Stories Page (Kudos / Testimonials)
  - "Stories"

- Contact Page
  - CTATitle
  - CTABody
  - ContactForm
  - LocationsTitle
  - Google Map Block

## Blocks
### CTA Block (Full Width)
> Used on: Home Page
- CTABody
  - Title
  - Summary
- CTAButton
  - ButtonText
  - ButtonURL

### Text Block
> Used on: Home Page
- BackgroundColour
- ForegroundColour
- Title
- Summary
- TextBlockButton [Optional]
  - ButtonText
  - ButtonURL

### Image Block
> Used on: Home Page
- Image

### RecentEvents Block
- I can see the 4 most recent events on the home page
- When I click on an event image / link, I am taken to the associated Event Page
- I can see a "Show all -->" button that links to the Event Listing Page

 ### BuyuBlock (Friends, Associates, Partners, Etc)
> Used on: Home Page
- Title
- BuyuItem (has_many)

### CTA Block (Restricted Width)
> Used on: Home Page
- BackgroundColour
- ForegroundColour
- Title
- CTABody
- CTAButton
  - ButtonText
  - ButtonURL

### About Block
> Used on: About Page
- Title
- Subtitle
- Content
- Image1
- Image1Caption
- Image2
- Image2Caption

### Image Text Block
> Used on: Content Page
- Title
- SubTitle
- Background Colour (White, Light Grey, Dark Grey, Red)
- Image1 (image or video)
- Image1Caption [Optional]
- Image2 [Optional]
- Image2 Subtitle [Optional]
- Video
- MediaPlacement (L / R)
- Content

## To Do
- Population data <in progress>
- Cypress tests
- Unit tests
- About Page: New images
- Video Block: Implement better video player
- Image gallery / media archive
- Blog
  - Investigate comment approval mechanism
- Contact email: HTML email template
- Markdown documentation including screenshots
- Home Page - `Friends` Block ("Partners", "Associates", "Buyu")
- e-commerce integration
- Member management system
