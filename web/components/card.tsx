import Image from "next/image";
import Link from "next/link";
import { PropsWithChildren } from "react";
import styles from "../styles/Card.module.css";
import { ProductType } from "../ts/interfaces/product";
import placeholder from "../public/placeholder.png";

interface PropsType extends PropsWithChildren {
	product: ProductType;
}

export default function Card({ product }: PropsType) {
	return (
		<article className={styles.card}>
			<Image
				src={placeholder}
				alt="Imagem placeholder para produto!"
				className={styles.product_image}
			/>

			<h4 className={styles.card_title}>
				<strong>{product.name}</strong>
			</h4>
			<p className={styles.card_weight}>Peso: {product.weight}</p>
			<p className={styles.card_category}>Categoria: {product.category.name}</p>
			<Link href={`/produtos/${product.slug}`}>Ver mais</Link>
		</article>
	);
}
