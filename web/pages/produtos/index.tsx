import { GetServerSideProps } from "next";
import { PropsWithChildren } from "react";
import Card from "../../components/card";
import { ProductType } from "../../ts/interfaces/product";
import styles from "../../styles/Products.module.css";

interface PropsType extends PropsWithChildren {
	products: ProductType[];
}

export default function Products({ products }: PropsType) {
	return (
		<>
			<h1 className={styles.title}>Produtos</h1>

			<div className={styles.products_grid}>
				{products.map((product: ProductType, index: number) => (
					<Card product={product} key={index} />
				))}
			</div>
		</>
	);
}

export const getServerSideProps: GetServerSideProps = async () => {
	const response = await fetch("http://localhost:5500/api/products");
	const { data: products } = await response.json();

	return {
		props: {
			products,
		},
	};
};
