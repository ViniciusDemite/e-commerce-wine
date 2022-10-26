import { GetServerSideProps } from "next";
import Card from "../../components/card";
import axios from "../../services/axios";
import styles from "../../styles/Products.module.css";
import { ProductsProps } from "../../ts/interfaces/ProductsInterface";
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
	const response = await axios.get("/products");
	const { data: products } = await response.data;

	return {
		props: {
			products,
		},
	};
};
