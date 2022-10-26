import CategoryType from "./category";

interface ProductType {
	id: number;
	name: string;
	slug: string;
	weight: number;
	category: CategoryType;
}

export default ProductType;
