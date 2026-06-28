<template>
  <div :class="['card recent-events-block', backgroundClass]">
    <div class="recent-events-block__title">
      <h2>{{ title }}</h2>
      <a :href="linkedPageUrl" class="recent-events-block__linked-page">全・See all events</a>
    </div>

    <div class="recent-event-wrapper">
      <div v-for="(event, index) in events" :key="index" class="recent-event">

        <div class="recent-event__start-date">
          {{ event.startDate }}
          <template v-if="event.isPast">
            <br />* This event has already taken place.
          </template>
        </div>

        <h3>
          <div :class="['recent-event__link', { 'text-image-block__text-title--past-event': event.isPast }]">
            {{ event.title }}
          </div>

          <div v-if="event.locationTitle || event.hostName || event.facebookUrl" class="text-image-block__text-location">
            <div class="icon event__bullets">

              <div v-if="event.locationTitle" class="event__bullet event__location-title">
                <i class="fa fa-map-marker"></i>
                {{ event.locationTitle }}
              </div>

              <div v-if="event.hostName" class="event__bullet event__host-dojo">
                <i class="fa-solid fa-house-chimney-user"></i>
                Hosted by
                <a v-if="event.hostUrl" :href="event.hostUrl" target="_blank">{{ event.hostName }}</a>
                <template v-else>{{ event.hostName }}</template>
              </div>

              <div v-if="event.facebookUrl" class="event__bullet">
                <i class="fa-brands fa-square-facebook"></i>
                <a :href="event.facebookUrl" target="_blank">View on Facebook</a>
              </div>

              <div v-if="!event.isPast && event.registrationLink" class="event__bullet event__registration-link">
                <i class="fa fa-sign-in"></i>
                <span v-html="event.registrationLink"></span>
              </div>
            </div>
          </div>
        </h3>

        <div class="recent-event__image">
          <div class="recent-event__link">
            <img v-if="event.imageUrl" :src="event.imageUrl" :alt="`Event image for ${event.title}`">
            <img v-else src="/_resources/themes/app/dist/img/DragonEnsoRyuUn.svg" class="logo" alt="Site Logo">
          </div>
        </div>

        <div class="recent-event__details" v-html="event.details"></div>
      </div>

      <div class="recent-events-block__title">
        <a :href="linkedPageUrl" class="recent-events-block__linked-page">全・See all events</a>
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
  title: {
    type: String,
    required: true
  },
  bgColour: {
    type: String,
    default: 'Light Grey'
  },
  linkedPageUrl: {
    type: String,
    default: '#'
  },
  events: {
    type: Array,
    default: () => []
  }
});

// Background colour logic
const backgroundClass = computed(() => {
  if (props.bgColour === 'Red') return 'red-bg';
  if (props.bgColour === 'Dark Grey') return 'medium-grey-bg-2';
  return 'light-grey-bg';
});
</script>
