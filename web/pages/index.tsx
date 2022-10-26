import Link from "next/link";
import styles from "../styles/Home.module.css";

export default function Home() {
	return (
		<div className={styles.home_container}>
			<h1 className={styles.title}>
				Bem-vindo ao <br /> <span>Wine E-commerce</span>
			</h1>
			<div className={styles.button_container}>
				<Link href="/produtos">
					<a className={styles.product_btn}>Ver produtos</a>
				</Link>
			</div>
		</div>
	);
}
