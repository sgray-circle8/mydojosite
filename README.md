# graydojo.org website

## v3.0
- Silverstripe CMS 6.1 upgrade
- Responsive design refresh using scss / bem

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

# To Do
- HomePage: RecentEvents: Past events: Mute title and add textual indicator / icon
- HomePage: RecentEvents: Link to registration details / contact
- About Page: New images
- Training Page: Video Block (Would be great to have mini video players for the event listings as well)
- Tests: phpunit, cypress
- Blog
  - Investigate comment approval mechanism
- Contact: Email template
- Markdown documentation including screenshots
- Home Page - `Friends` Block ("Partners", "Associates", "Buyu")
- Silvershop integration

## To Do: Event Page
  - Link back to Event Listing Page
  - An 'event has passed' message if the EndDate is in the past
    - Or if there is no EndDate, if the StartDate is in the past
  - An h1 Title (the Event Title)
  - Date @ Time - Date @ Time
    - If no EndDate or if EndDate == StartDate, omit EndDate
  - Details Section
    - Configurable background colour
    - Summary
    - Venue
    - Schedule
    - Fees
    - Registration info / link
    - Social media link
    - Payment information
    - Meal / catering information
    - Grading information
    - Entertainment information
    - Add-To-Calendar dropdown
      - https://kendo.org.nz/event/national-naginata-seminar/
  - Link back to Event Listing Page

## To Do: Gallery
> Used on: About Page
- Title
- Images

