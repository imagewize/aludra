/**
 * Dynamic block: the frontend markup comes from render.php.
 *
 * The placeholder's button and hint are the only copy a visitor ever reads, and
 * strings emitted from save() are frozen into post_content untranslated — so
 * the markup is built server-side instead. Nothing from instagram.com loads
 * until a visitor clicks; view.js injects the iframe.
 */
export default function Save() {
	return null;
}
