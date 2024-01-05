/// <reference types="astro/client" />

interface ImportMetaEnv {
  readonly STORYBLOK_TOKEN: string;
  readonly STORYBLOK_IS_PREVIEW: string;
  readonly STORYBLOK_ENV: string;
}
