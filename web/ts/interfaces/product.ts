import { CategoryType } from "./category";

export interface ProductType {
	id: number;
	name: string;
	slug: string;
	weight: number;
	category: CategoryType;
}
