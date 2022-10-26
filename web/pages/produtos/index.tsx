import { GetServerSideProps } from "next";
import Card from "../../components/card";
import styles from "../../styles/Products.module.css";
import ProductsProps from "../../ts/interfaces/ProductsInterface";
import ProductType from "../../ts/types/product";

export default function Products({ products }: ProductsProps) {
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
