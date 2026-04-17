# graydojo.org website

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
  > "About", "Training", "Mentors"
- Event Listing Page
  > "Events"
- Event Page
- Stories Page
  > "Stories"
- Contact Page
  - CTATitle
  - CTABody
  - ContactForm
  - LocationsTitle

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
> Strip out unnecessary Event class functions
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

### Gallery
> Used on: About Page
- Title
- Images

### Image Text Block
> Used on: Content Page
- Image [Optional]
- Video
- MediaPlacement (L / R)
- Title
- SubTitle
- Content


# To Do
- Home Page
  - Header: mobile nav focus trap
  - Random quotes
  - Block text font and line spacing
  - `Friends` Block ("Partners", "Associates", "Buyu")
- Events block
- Add phpunit
- Blog
  - Investigate comment approval mechanism
- Silvershop?
