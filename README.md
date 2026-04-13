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
  > "About", "Training", "Instructor"
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

### ImageBlock
> Used on: Home Page
- Image

### Details Block
> Used on: Home Page
- Title
- SubTitle
- Content

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
- Footer
  - Reduce black space above and below red strip 
  - Dynamic SiteMap links
  - Dynamic Contact links
- Home Page
  - `Friends` Block ("Partners", "Associates", "Buyu")
  - Random quotes
- Events block
  - Add 2022 Kagamibiraki news/photo
- Add phpunit
- Add functionality for compiled styles
- Organise styling
- Blog
  - Investigate comment approval mechanism
- Silvershop?
