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
			<figure>
				<Image
					src={placeholder}
					alt="Imagem placeholder para produto!"
					width={250}
					height={200}
				/>
			</figure>

			<h4 className={styles.card_title}>
				<strong>{product.name}</strong>
			</h4>
			<p className={styles.card_weight}>
				<strong>Peso:</strong> {product.weight}
			</p>
			<p className={styles.card_category}>
				<strong>Categoria:</strong> {product.category.name}
			</p>
			<Link href={`/produtos/${product.slug}`}>
				<a className={styles.card_btn}>Ver mais</a>
			</Link>
		</article>
	);
}
