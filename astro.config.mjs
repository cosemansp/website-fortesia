import { defineConfig } from "astro/config";
import { loadEnv } from "vite";
import storyblok from "@storyblok/astro";
import basicSsl from "@vitejs/plugin-basic-ssl";
import tailwind from "@astrojs/tailwind";
import vercel from "@astrojs/vercel/serverless";

// https://astro.build/config
const env = loadEnv("", process.cwd(), "STORYBLOK");

export default defineConfig({
  integrations: [
    tailwind(),
    storyblok({
      apiOptions: {
        region: "eu",
      },
      accessToken: env.STORYBLOK_TOKEN,
      bridge: env.STORYBLOK_IS_PREVIEW === "yes",
      components: {
        page: "storyblok/Page",
        feature: "storyblok/Feature",
        grid: "storyblok/Grid",
        teaser: "storyblok/Teaser",
        hero: "storyblok/Hero",
        config: "storyblok/Config",
        article: "storyblok/Article",
        "popular-articles": "storyblok/PopularArticles",
        "all-articles": "storyblok/AllArticles",
      },
    }),
  ],
  output: env.STORYBLOK_IS_PREVIEW === "yes" ? "server" : "static",
  adapter: vercel(),
  ...(env.STORYBLOK_ENV === "development" && {
    vite: {
      plugins: [basicSsl()],
      server: {
        https: true,
      },
    },
  }),
});
