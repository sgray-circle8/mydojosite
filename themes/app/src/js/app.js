import { createApp } from 'vue';
import RecentEventsBlock from './components/RecentEventsBlock.vue';

document.addEventListener('DOMContentLoaded', () => {
    const eventBlocks = document.querySelectorAll('.vue-recent-events-block');

    eventBlocks.forEach(el => {
        let rawEvents = el.dataset.events || '[]';

        try {
            // Fix hex escapes: Convert \x3c to \u003c
            rawEvents = rawEvents.replace(/\\x([0-9a-fA-F]{2})/g, '\\u00$1');

            // Fix escaped single quotes (invalid in strict JSON): Convert \' to '
            rawEvents = rawEvents.replace(/\\'/g, "'");

            // Remove trailing commas before the closing bracket
            // This catches "}," followed by any whitespace/newlines, then "]"
            rawEvents = rawEvents.replace(/,\s*]/g, ']');

            // Attempt to parse the string
            const parsedEvents = JSON.parse(rawEvents);

            const props = {
                title: el.dataset.title,
                bgColour: el.dataset.bgcolour,
                linkedPageUrl: el.dataset.linkedpageurl,
                events: parsedEvents
            };

            const app = createApp(RecentEventsBlock, props);
            app.mount(el);

        } catch (error) {
            console.error("🚨 Vue failed to mount 🙁");
            console.error("Error:", error);
            console.log("Could not parse:", rawEvents);
        }
    });
});