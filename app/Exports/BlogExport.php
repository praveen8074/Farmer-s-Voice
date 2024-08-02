<?php

namespace App\Exports;

use App\Models\Blog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BlogExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Blog::all(); // Fetch all blog data
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Title',
            'Assigned Person',
        ];
    }

    /**
     * @param Blog $blog
     * @return array
     */
    public function map($blog): array
    {
        return [
            $blog->id,
            $blog->title,
            $blog->assigned_user,
        ];
    }
}
