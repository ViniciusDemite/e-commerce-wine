import Link from "next/link";
import styles from "../styles/Home.module.css";

export default function Home() {
	return (
		<>
			<h1 className={styles.title}>
				Bem-vindo ao <br /> <span>Wine E-commerce</span>
			</h1>
			<Link href="/produtos">
				<a className={styles.product_btn}>Ver produtos</a>
			</Link>
		</>
	);
}
