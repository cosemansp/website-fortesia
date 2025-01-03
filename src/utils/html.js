export function splitHtmlStringPerPTag(htmlString) {
  const regex = /<p>(.*?)<\/p>/g;
  let result;
  let paragraphTexts = [];

  while ((result = regex.exec(htmlString.replaceAll("\n", ""))) !== null) {
    paragraphTexts.push("<p>" + result[1] + "</p>");
  }
  return paragraphTexts;
}
