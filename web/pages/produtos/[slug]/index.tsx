import { useRouter } from "next/router";

export default function Product() {
	const router = useRouter();
	const { slug } = router.query;

	return <h1>Produto {slug}</h1>;
}
