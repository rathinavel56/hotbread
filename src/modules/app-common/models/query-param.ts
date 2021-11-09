
export interface QueryParam {
    id?: number;
    page?: number;
    category_id?: number | string;
    sort?: string;
    sortby?: string;
    class?: string;
    is_web?: boolean;
    is_active?: boolean;
    q?: string;
}
